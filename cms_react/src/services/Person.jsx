import http from "./httpServices";
import config from "../config.json";

export const _Admins = () => {
    return http.post(`${config.api_url}admins`, {}, { headers: {
        "Action": "admins",
    }});
};

export const _AdminRoles = () => {
    return http.post(`${config.api_url}adminroles`, {}, { headers: {
        "Action": "adminRoles",
    }});
};
export const _Roles = () => {
    return http.post(`${config.api_url}roles`, {}, { headers: {
        "Action": "roles",
    }});
};

export const _Permissions = (data) => {
    return http.post(`${config.api_url}permissions`, data, { headers: {
        "Action": "permissions",
    }});
};
export const _CreatePerson = (data) => {
    return http.post(`${config.api_url}createperson`, data, { headers: {
        "Action": "createPerson",
    }});
};

export const _EditPerson = (data) => {
    return http.post(`${config.api_url}editperson`, data, { headers: {
        "Action": "editPerson",
    }});
};
