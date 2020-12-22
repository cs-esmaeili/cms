import http from "./httpServices";
import config from "../config.json";

export const _Admins = () => {
    return http.post(`${config.api_url}admins`, {}, {
        headers: {
            "Action": "admins",
        }
    });
};

export const _AdminRoles = () => {
    return http.post(`${config.api_url}adminroles`, {}, {
        headers: {
            "Action": "adminRoles",
        }
    });
};
export const _Roles = () => {
    return http.post(`${config.api_url}roles`, {}, {
        headers: {
            "Action": "roles",
        }
    });
};
export const _RolePermissions = (data) => {
    return http.post(`${config.api_url}rolepermissions`, JSON.stringify(data), {
        headers: {
            "Action": "rolePermissions",
        }
    });
};

export const _DeletePermission = (data) => {
    return http.post(`${config.api_url}deletepermission`, JSON.stringify(data), {
        headers: {
            "Action": "deletePermission",
        }
    });
};

export const _AddPermission = (data) => {
    return http.post(`${config.api_url}addpermission`, JSON.stringify(data), {
        headers: {
            "Action": "addPermission",
        }
    });
};

export const _AddRole = (data) => {
    return http.post(`${config.api_url}addrole`, JSON.stringify(data), {
        headers: {
            "Action": "addRole",
        }
    });
};

export const _MissingPermissions = (data) => {
    return http.post(`${config.api_url}missingpermissions`, JSON.stringify(data), {
        headers: {
            "Action": "missingPermissions",
        }
    });
};


export const _CreatePerson = (data) => {
    return http.post(`${config.api_url}createperson`, data, {
        headers: {
            "Action": "createPerson",
        }
    });
};

export const _EditPerson = (data) => {
    return http.post(`${config.api_url}editperson`, data, {
        headers: {
            "Action": "editPerson",
        }
    });
};
