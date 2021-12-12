import request from '@/libs/axios'

export class Resource {
  constructor(uri) {
    this.uri = uri
  }

  getAll(query) {
    return request({
      url: '/' + this.uri,
      method: 'get',
      params: query,
    })
  }
  getById(id) {
    return request({
      url: '/' + this.uri + '/' + id,
      method: 'get',
    })
  }
  store(resource) {
    return request({
      url: '/' + this.uri,
      method: 'post',
      data: resource,
    })
  }
  update(id, resource) {
    return request({
      url: '/' + this.uri + '/' + id,
      method: 'put',
      data: resource,
    })
  }
  destroy(id) {
    return request({
      url: '/' + this.uri + '/' + id,
      method: 'delete',
    })
  }
}
