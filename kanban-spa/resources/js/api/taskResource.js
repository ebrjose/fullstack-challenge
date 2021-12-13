import { Resource } from './resource'

class TaskResource extends Resource {
  constructor() {
    super('tasks')
  }

  updateIndexes(resource) {
    return this.request({
      url: `/tasks/update-indexes`,
      method: 'post',
      data: resource,
    })
  }
}

const taskResource = new TaskResource()
export { taskResource as TaskResource }
