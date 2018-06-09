const getters = {
  sidebar: state => state.app.sidebar,
  device: state => state.app.device,
  wH: state=> state.app.wH,
  visitedViews: state => state.tagsView.visitedViews,
  cachedViews: state => state.tagsView.cachedViews,
  token: state => state.user.token,
  avatar: state => state.user.avatar,
  name: state => state.user.name,
  roles: state => state.user.roles,
  opts: state => state.opt.opts
}

export default getters
