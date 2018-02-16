import axios from 'axios'

export default {
  getAll(callBack) {
    axios.get('/REST.php/Project/get_all.json').then(function(resp) {
      callBack(resp.data.data);
    });
  },
  getOption(callBack) {
    axios.get('/REST.php/Project/get_options.json').then(function(resp) {
      callBack(resp.data.data);
    });
  },
  saveOption(options, callBack) {
    axios.post('/REST.php/Project/save_options', {options: options}).then(function(resp){
      callBack(resp);
    });
  },
  save(options, callBack) {
    axios.post('/REST.php/Project/save', {options: options}).then(function(resp){
      callBack(resp);
    });
  }
}
