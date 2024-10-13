import "./adminLtrJs/jquery.js";
import "./adminLtrJs/adminlte.js";
import "./adminLtrJs/bootstrap461.js";
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
