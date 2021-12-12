import { Resource } from './resource'

class BoardResource extends Resource {
  constructor() {
    super('boards')
  }
}

const boardResource = new BoardResource()
export { boardResource as BoardResource }
