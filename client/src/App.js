import React, { useState, useEffect } from 'react';
import axios from 'axios';
import './estilos.css';
import logo from './kueskilogo.png';

function openTab(a) {
  var dialog = document.getElementById(a);
  if (dialog) {
    dialog.showModal();
  }
}


function MostrarDatos() {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    axios.get('/users')
      .then(response => {
        setUsers(response.data);
      })
      .catch(error => {
        console.log(error);
      });
  }, []);
  
  return (
    <div>
      <header>
        <div className="logo">
          <img src={logo} alt="Logo de la empresa" />
        </div>
        <div className="title">
          <h1>Welcome Back, Marci</h1>
        </div>
      </header>
      <main>
        <div className="sidebar">
          <ul>
            <li><a href="#">Clients</a></li>
            <li><a href="#">Checkout</a></li>
            <li><a href="#">Settings</a></li>
          </ul>
        </div>
        <table>
          <thead>
            <tr>
              <th>User Id</th>
              <th>Email</th>
              <th>Name</th>
              <th>First Last Name</th>
              <th>nationality</th>
              <th>CURP</th>
              <th>Phone Number</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {users.map(user => (
              <tr key={user.Identity_user_id}>
                <td>{user.identity_user_id}</td>
                <td>{user.email}</td>
                <td>{user.name}</td>
                <td>{user.first_last_name}</td>
                <td>{user.nationality}</td>
                <td>{user.curp}</td>
                <td>{user.phone_number}</td>
                <td><button className="tablink" onClick={() => openTab('modular')}>....</button></td>
              </tr>
            ))}
          </tbody>
        </table>
      </main>
    </div>
  );
}

export default MostrarDatos;