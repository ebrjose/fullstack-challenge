import { Resource } from './resource'

class TaskListResource extends Resource {
  constructor() {
    super('task-list')
  }
}

const taskListResource = new TaskListResource()
export { taskListResource as TaskListResource }
