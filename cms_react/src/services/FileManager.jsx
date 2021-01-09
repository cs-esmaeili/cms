import http from "./httpServices";
import config from "../config.json";


export const _publicFolderFiles = (data) => {
    return http.post(`${config.api_url}publicFolderFiles`, JSON.stringify(data), {
        headers: {
            "Action": "publicFolderFiles",
        }
    });
};
export const _deletePublicFolderOrFile = (data) => {
    return http.post(`${config.api_url}deletePublicFolderOrFile`, JSON.stringify(data), {
        headers: {
            "Action": "deletePublicFolderOrFile",
        }
    });
};
export const _createPublicFolder = (data) => {
    return http.post(`${config.api_url}createPublicFolder`, JSON.stringify(data), {
        headers: {
            "Action": "createPublicFolder",
        }
    });
};
