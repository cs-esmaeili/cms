import axios from "axios";
import { toast } from 'react-toastify';


const notify = (text) => toast(text);

axios.defaults.headers.post["Content-Type"] = "application/json";
const token = localStorage.getItem("token");
if (token) axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;

axios.interceptors.response.use((response) => {
    return response;
}, (error) => {
    if (error.response.data.description === "token expired" || error.response.data.description === "token is wrong") {
        //  getRef("Modal_Token_btn").current.click();
        return Promise.reject(error);
    }
    if (error.response.data.description === "permission denid") {
        // getRef("Modal_Permission_btn").current.click();
        return Promise.reject(error);
    }
    const expectedErrors =
        error.response &&
        error.response.status >= 400 &&
        error.response.status < 500;
    if (!expectedErrors) {
        notify("مشکلی در ارتباط با سرور پیش آمد دوباره تلاش کنید");
    }

    return Promise.reject(error);
});

export default {
    get: axios.get,
    post: axios.post,
    put: axios.put,
    delete: axios.delete,
    axios: axios,
};
