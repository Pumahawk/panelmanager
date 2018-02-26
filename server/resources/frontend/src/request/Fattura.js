import axios from 'axios'

export default {
  create(fattura, callBack) {
    axios.post('/REST.php/Fattura/create', data).then(callBack);
  },
  getAll(callBack) {
    axios.get('/REST.php/Fattura/all').then(callBack);
  },
  remove(name, callBack) {
    axios.post('/REST.php/Fattura/delete', {name:name}).then(callBack);
  }
}
