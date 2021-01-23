import React, { useEffect, useRef, useState } from "react";
import { getValidator, rules } from '../../../global/validator_rules';
import { setCookie } from '../../../global/cookie';
import config from "../../../config.json";
import { LogIn } from "../../../services/Authorization";
import { useDispatch } from "react-redux";
import { setProfileData, setToken } from "../../../actions/profile";
import { withRouter } from "react-router-dom";
import './Login.css';

const Login = ({ history }) => {
    const [username, Setusername] = useState("");
    const [password, Setpassword] = useState("");
    const [show, setShow] = useState(true);
    const [forceUpdate, setForceUpdate] = useState(false);
    const validator = useRef(getValidator);
    const dispatch = useDispatch();


    const handelSubmit = async (event) => {
        event.preventDefault();
        const obj = {
            username,
            password,
        };
        if (validator.current.allValid()) {
            try {
                const respons = await LogIn(obj);
                if (respons.data.statusText === "ok") {
                    setCookie(30, 'token', respons.data.token);
                    await dispatch(setToken(respons.data.token));
                    history.replace(config.web_url);
                } else {
                    setShow(true);
                }
            } catch (error) {
            }
        } else {
            validator.current.showMessages();
            setForceUpdate(!forceUpdate);
        }
    };

    useEffect(() => {
        history.replace(config.web_url + "logIn");
    }, []);

    return (
        <div className="container-fluid bg-gradient-primary" style={{ height: "100vh" }}>
            <div className="row h-100 align-items-center justify-content-center">
                <div className="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div className="card mb-4 py-3 border-bottom-danger">
                        <div className="card-body test">
                            <img className="img-fluid" src={config.logo_url} alt="cant load" style={{ borderRadius: "50%", padding: "inherit" }} />
                            <form className="user" onSubmit={handelSubmit} >
                                <div className="form-group">
                                    <input className="form-control form-control-user" placeholder="نام کاربری"
                                        value={username}
                                        onChange={(e) => {
                                            Setusername(e.target.value);
                                            setShow(false);
                                            validator.current.showMessageFor(
                                                "username"
                                            );
                                        }}
                                    />
                                    {validator.current.message(
                                        "username",
                                        username,
                                        rules('username')
                                    )}
                                </div>
                                <div className="form-group">
                                    <input type="password" className="form-control form-control-user" id="exampleInputPassword"
                                        placeholder="رمز عبور"
                                        value={password}
                                        onChange={(e) => {
                                            Setpassword(e.target.value);
                                            setShow(false);
                                            validator.current.showMessageFor(
                                                "password"
                                            );
                                        }}
                                    />
                                    {validator.current.message(
                                        "password",
                                        password,
                                        rules('password')
                                    )}
                                </div>


                                {show
                                    ? <div className="alert alert-danger" role="alert" style={{ textAlign: "center" }}>
                                        نام کاربری یا رمز عبور اشتباه است
                                            </div>
                                    : null}

                                <button type="submit" className="btn btn-primary btn-user btn-block">
                                    ورود
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default withRouter(Login);;
