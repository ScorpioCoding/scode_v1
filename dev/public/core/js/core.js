import apiUri from "./api/urls.js";
window.apiUri = apiUri;

import Create from "./api/create.js";
window.apiCreate = Create;

import Read from "./api/read.js";
window.apiRead = Read;

import Update from "./api/update.js";
window.apiUpdate = Update;

import Delete from "./api/delete.js";
window.apiDelete = Delete;

import LogIn from "./api/login.js";
window.apiLogin = LogIn;

import SetStorage from "./auth/setstorage.js";
window.authSetStorage = SetStorage;

import GetStorage from "./auth/getstorage.js";
window.authGetStorage = GetStorage;

import PostRedirect from "./auth/postredirect.js";
window.authPostRedirect = PostRedirect;
