import axios from 'axios'
import config from './config'

export default {
  getInfo(callBack) {
    axios.get(config.restPath + '/Project/getinfo/{id:[0-9]+}.json').then(function(resp) {
      callBack(resp.data.data);
    });
  },
  getAll(callBack) {
    axios.get(config.restPath + '/Project/get_all.json').then(function(resp) {
      callBack(resp);
    });
  },
  getOption(callBack) {
    axios.get(config.restPath + '/Project/get_options.json').then(function(resp) {
      callBack(resp);
    });
  },
  saveOption(options, callBack) {
    axios.post(config.restPath + '/Project/save_options', {options: options}).then(function(resp){
      callBack(resp);
    });
  },
  save(options, callBack) {
    axios.post(config.restPath + '/Project/save', {options: options}).then(function(resp){
      callBack(resp);
    });
  },
  getById(id, callBack) {
    axios.get(config.restPath + '/Project/open/' + id + '.json').then(function(resp){
      callBack(resp);
    });
  },
  destroy(id, callBack) {
    axios.get(config.restPath + '/Project/delete/' + id).then(function(resp){
      callBack(resp);
    });
  },
  edit(progetto, callBack) {
    axios.post(config.restPath + '/Project/edit', {progetto: progetto}).then(function(resp){
      callBack(resp);
    });
  }
}
