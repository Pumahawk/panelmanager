import axios from 'axios'

export default {
  logout(callBack) {
    axios.get('/REST.php/User/logout').then(callBack);
  },
  login(data, callBack) {
    axios.post('/REST.php/App/login', data).then(callBack);
  }
}
