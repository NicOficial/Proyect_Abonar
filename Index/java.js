// server.js
const express = require('express');
const bodyParser = require('body-parser');
const bcrypt = require('bcrypt');
const app = express();
app.use(bodyParser.urlencoded({ extended: true }));
const port = 3000;
const saltRounds = 10;
const usersTable = [
  // Example data:
  // { id: 1, username: 'testuser', password_hash: 'your-secure-hash-here' }
];
// This example uses sync function, don't use this in a real-world scenario
const getUserByUsername = (username) => {
  return usersTable.find(user => user.username === username);
};
app.post('/login', async (req, res) => {
  const userToLogin = getUserByUsername(req.body.username);
  if (userToLogin) {
    bcrypt.compare(req.body.password, userToLogin.password_hash, (err, result) => {
      if (result) {
        res.send(`Welcome ${userToLogin.username}!`);
      } else {
        res.send('Invalid password');
      }
    });
  } else {
    res.send('Invalid username');
  }
});
app.listen(port, () => {
  console.log(`Server listening at http://localhost:${port}`);
});