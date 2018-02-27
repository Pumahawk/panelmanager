import axios from 'axios'
import config from './config'

export default {
  logout(callBack) {
    axios.get(config.restPath + '/User/logout').then(callBack);
  },
  login(data, callBack) {
    axios.post(config.restPath + '/App/login', data).then(callBack);
  },
  editMail(mail, callBack) {
    axios.post(config.restPath + '/User/edit/mail', {email:mail}).then(callBack);
  },
  editPassword(password, callBack) {
    axios.post(config.restPath + '/User/edit/password', {password:password}).then(callBack);
  },
  info(callBack) {
    axios.get(config.restPath + '/User/info').then(callBack);
  }
}
