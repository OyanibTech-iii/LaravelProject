import './bootstrap';

import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

import DataTable from 'datatables.net-dt';
window.DataTable = DataTable;

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

Alpine.plugin(collapse);
window.Alpine = Alpine;

Alpine.start();
