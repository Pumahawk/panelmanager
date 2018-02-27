import axios from 'axios'
import config from './config'

export default {
  create(fattura, callBack) {
    axios.post(config.restPath + '/Fattura/create', fattura).then(callBack);
  },
  getAll(callBack) {
    axios.get(config.restPath + '/Fattura/all').then(callBack);
  },
  remove(name, callBack) {
    axios.post(config.restPath + '/Fattura/delete', {name:name}).then(callBack);
  },
  getOption(callBack) {
    axios.get(config.restPath + '/Fattura/Option').then(callBack);
  },
  saveOption(option, callBack) {
    axios.post(config.restPath + '/Fattura/Option/save', option).then(callBack);
  }
}
