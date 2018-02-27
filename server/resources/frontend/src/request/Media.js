import axios from 'axios'
import config from './config'

export default {
  getAll(callBack) {
    axios.get(config.restPath + '/Media/get_all.json').then(callBack);
  },
  getByIdProject(id, callBack) {
    axios.post(config.restPath + '/Media/get_by_id_project.json',{id:id}).then(callBack);
  },
  upload(data, callBack) {
    axios.post(config.restPath + '/Media/upload', data).then(callBack)
  },
  cancella(id, callBack) {
    axios.post(config.restPath + '/Media/delete', {id:id}).then(callBack)
  }
}
