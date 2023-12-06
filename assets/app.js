import './bootstrap.js';
// import et configuration de jquery pour bootstrap
const $ = require('jquery');
global.$ = global.jQuery = $;

// import bootstrap style
import 'bootstrap';

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';  //!\\ ne concerne pas bootstrap style !


require('bootstrap-icons/font/bootstrap-icons.css');
import './scripts/ContactDropdown.js';



