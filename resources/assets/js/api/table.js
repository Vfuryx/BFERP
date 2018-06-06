import request from '../utils/request.js'

export function getList(params) {
  return request({
    url: '/table/list',
    method: 'get',
    params
  })
}
