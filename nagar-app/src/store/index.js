import { createStore, createLogger } from 'vuex'
import applicants from './modules/applicants'

const debug = process.env.NODE_ENV !== 'production'

export default createStore({
  modules: {
    applicants
  },
  strict: debug,
  plugins: debug ? [createLogger()] : []
})