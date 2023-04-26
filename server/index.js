// server/index.js
const express = require("express");
const bodyParser = require('body-parser');
const mysql = require('mysql');


const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'kueski3'
});

connection.connect((err) => {
  if (err) throw err;
  console.log('Connected to database');
});

const app = express();
app.use(bodyParser.json());

app.get("/api/hello", (req, res) => {
  res.json({ message: "Hello from server side!"});
});

// Endpoint inicial
app.get('/users', (req, res) => {
  // Query the database to get all user information
  connection.query('SELECT * FROM users', (error, results, fields) => {
    if (error) {
      console.error(error);
      res.status(500).send('Internal server error');
      return;
    }

    // If users were found, send their information
    if (results.length > 0) {
      res.send(results);
    } else {
      // Otherwise, send a 404 error
      res.status(404).send(`No users found`);
    }
  });
});


app.get('/api/login', (req, res) => {
  res.send('You have successfully logged in.');
});


const PORT = process.env.PORT || 3001;
app.listen(PORT, () => {
  console.log(`Server listening on ${PORT}`);
});
