import axios from 'axios'
import qs from 'qs'

export function login(data) {
  return axios({
    url: '/authorizations',
    method: 'post',
    data: qs.stringify(data)
  })
}

export function getInfo() {
  return axios({
    url: '/me',
    method: 'post'
  })
}

export function logout() {
  return axios({
    url: '/authorizations/current',
    method: 'put'
  })
}
