import axios from 'axios'

export default {
  logout(callBack) {
    axios.get('/REST.php/User/logout').then(callBack);
  },
  login(data, callBack) {
    axios.post('/REST.php/App/login', data).then(callBack);
  },
  editMail(mail, callBack) {
    axios.post('/REST.php/User/edit/mail', {email:mail}).then(callBack);
  },
  editPassword(password, callBack) {
    axios.post('/REST.php/User/edit/password', {password:password}).then(callBack);
  },
  info(callBack) {
    axios.get('/REST.php/User/info').then(callBack);
  }
}
