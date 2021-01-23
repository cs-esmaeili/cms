import React from "react";
import { getCookie } from "../../global/cookie";
import Login from "./Login/Login";
import { useSelector, useDispatch } from "react-redux";
import { setToken } from "../../actions/profile";
import Logout from "../components/modals/Logout";
import ContentAndSidebar from "./partials/ContentAndSidebar";

const Main = () => {
    const token = useSelector((state) => state.token);
    const dispatch = useDispatch();
    if (token === null && getCookie('token') !== null) {
        dispatch(setToken(getCookie('token')));
    }
    return (
        <>
            {getCookie('token') === null ?
                <Login />
                :
                <div id="wrapper">
                    <ContentAndSidebar />
                    <Logout />
                </div>

            }
        </>
    );
}

export default Main;
