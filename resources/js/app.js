import "./bootstrap";
import $ from "jquery";
import Alpine from "alpinejs";

window.$ = window.jQuery = $;

window.Alpine = Alpine;
Alpine.start();

import "./Components/ContactList/ActionsContactList.js";
import "./Components/Group/ActionsGroup.js";
import "./Components/Chat/ActionsChat.js";
import "./Components/Message/ActionMessage.js";
import "./Utils/Requests.js";
