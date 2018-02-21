import axios from 'axios'

export default {
  getAll(callBack) {
    axios.get('/REST.php/Media/get_all.json').then(callBack);
  },
  getByIdProject(id, callBack) {
    axios.post('/REST.php/Media/get_by_id_project.json',{id:id}).then(callBack);
  },
  upload(data, callBack) {
    axios.post('/REST.php/Media/upload', data).then(callBack)
  },
  cancella(id, callBack) {
    axios.post('/REST.php/Media/delete', {id:id}).then(callBack)
  }
}
