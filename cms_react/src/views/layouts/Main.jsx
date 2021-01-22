import React, { useState } from "react";
import { getCookie } from "../../global/cookie";
import Login from "./Login/Login";
import Sidebar from "./partials/Sidebar";
import { useSelector, useDispatch } from "react-redux";
import { setToken } from "../../actions/profile";
import Logout from "../components/modals/Logout";
import ContentWrapper from './partials/ContentWrapper';

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
                    <ContentWrapper />
                    <Sidebar />
                    <Logout />
                </div>
            }
        </>
    );
}

export default Main;
