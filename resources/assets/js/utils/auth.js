import Cookies from 'js-cookie';

const TokenKey = 'Admin-Token';
const User = 'Admin-User';

export function getToken() {
  return Cookies.get(TokenKey);
}

export function setToken(token) {
  return Cookies.set(TokenKey, token);
}

export function removeToken() {
  return Cookies.remove(TokenKey);
}

export function getUser() {
  return Cookies.get(User);
}

export function setUser(user) {
  return Cookies.set(User, user);
}

export function removeUser() {
  return Cookies.remove(User);
}
