import axios from 'axios'

export default {
  create(fattura, callBack) {
    axios.post('/REST.php/Fattura/create', fattura).then(callBack);
  },
  getAll(callBack) {
    axios.get('/REST.php/Fattura/all').then(callBack);
  },
  remove(name, callBack) {
    axios.post('/REST.php/Fattura/delete', {name:name}).then(callBack);
  },
  getOption(callBack) {
    axios.get('/REST.php/Fattura/Option').then(callBack);
  },
  saveOption(option, callBack) {
    axios.post('/REST.php/Fattura/Option/save', option).then(callBack);
  }
}
