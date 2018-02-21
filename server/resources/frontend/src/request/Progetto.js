import axios from 'axios'

export default {
  getInfo(callBack) {
    axios.get('/REST.php/Project/getinfo/{id:[0-9]+}.json').then(function(resp) {
      callBack(resp.data.data);
    });
  },
  getAll(callBack) {
    axios.get('/REST.php/Project/get_all.json').then(function(resp) {
      callBack(resp);
    });
  },
  getOption(callBack) {
    axios.get('/REST.php/Project/get_options.json').then(function(resp) {
      callBack(resp);
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
  },
  getById(id, callBack) {
    axios.get('/REST.php/Project/open/' + id + '.json').then(function(resp){
      callBack(resp);
    });
  },
  destroy(id, callBack) {
    axios.get('/REST.php/Project/delete/' + id).then(function(resp){
      callBack(resp);
    });
  },
  edit(progetto, callBack) {
    axios.post('/REST.php/Project/edit', {progetto: progetto}).then(function(resp){
      callBack(resp);
    });
  }
}
