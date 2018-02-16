import axios from 'axios'

export default {
  getAll(callBack) {
    axios.get('/REST.php/Project/get_all.json').then(function(resp) {
      callBack(resp.data.data);
    });
  }
}
