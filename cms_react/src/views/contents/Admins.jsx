import React, { useState, useEffect, useRef } from "react";
import { _Admins, _AdminRoles, _CreatePerson, _EditPerson } from "../../services/Person";
import Table from "../components/Table.jsx";
import useGenerator from "../../global/Idgenerator";
import { getValidator, rules } from '../../global/validator_rules';
import { toast } from 'react-toastify';
import { array_move } from '../../global/helpers';
const Admins = () => {
    const [admins, setAdmins] = useState(null);
    const [adminRoles, setAdminRoles] = useState(null);
    const [image, setImage] = useState("/img/undraw_profile.svg");
    const [username, setUsername] = useState("");
    const [oldUsername, setOldUsername] = useState("");
    const [password, setPassword] = useState("");
    const [name, setName] = useState("");
    const [family, setFamily] = useState("");
    const [description, setDescription] = useState("");
    const [roleId, setRoleId] = useState("");
    const [generateID] = useGenerator();
    const [clearSelect, setclearSelect] = useState(generateID());
    const [forceUpdate, setForceUpdate] = useState(false);
    const [selecting, setSelecting] = useState(false);
    const validator = useRef(getValidator);

    const columens = (row, generateID) => {
        return (
            <>
                <th key={generateID()} scope="col" className="text-center">{row.family}</th>
                <th key={generateID()} scope="col" className="text-center">{row.name}</th>
                <th key={generateID()} scope="col" className="text-center">{row.role}</th>
                <th key={generateID()} scope="col" className="text-center">{row.username}</th>
            </>
        );
    }
    const getAdmins = async () => {
        try {
            const respons = await _Admins();
            if (respons.data.statusText === "ok") {
                setAdmins(respons.data.list);
            }
        } catch (error) { }
    }
    const getAdminRoles = async () => {
        try {
            const respons = await _AdminRoles();
            if (respons.data.statusText === "ok") {
                setRoleId(respons.data.list[0].role_id)
                setAdminRoles(respons.data.list);
            }
        } catch (error) { }
    }
    const showimage = (event) => {
        const reader = new FileReader();
        reader.onload = () => {
            if (reader.readyState === 2) {
                setImage(reader.result + "");
            }
        };
        reader.readAsDataURL(event.target.files[0]);
    };
    const resetInputs = (data) => {
        validator.current.hideMessageFor();
        if (data === null) {
            setImage("/img/undraw_profile.svg");
            setUsername("");
            setPassword("");
            setName("");
            setFamily("");
            setRoleId("");
            setSelecting(false);
        } else {
            setOldUsername(data.username);
            setSelecting(true);
            setImage(data.image);
            setPassword("");
            setUsername(data.username);
            setName(data.name);
            setFamily(data.family);
            setRoleId(data.role_id);
            setDescription(data.description);
            let index = adminRoles.findIndex(x => x.role_id === data.role_id);
            let reOrder = array_move(adminRoles, index, 0);
            setAdminRoles(reOrder);
        }
        setForceUpdate(!forceUpdate);
    }
    const handelSubmit = async (event) => {
        console.log("handelSubmit");

        event.preventDefault();
        let data = new FormData();
        data.append("username", username);
        data.append("password", password);
        data.append("name", name);
        data.append("family", family);
        data.append("role_id", roleId);
        data.append("oldUsername", oldUsername);
        data.append("description", description);
        data.append("image", event.target.imageUrl.files[0]);

        if (validator.current.allValid()) {
            try {
                if (selecting) {
                    const response = await _EditPerson(data);
                    if (response.data.statusText === "ok") {
                        resetInputs(null);
                        getAdmins();
                    }
                    toast(response.data.message);
                } else {
                    const response = await _CreatePerson(data);
                    if (response.data.statusText === "ok") {
                        resetInputs(null);
                        getAdmins();
                    }
                    toast(response.data.message);
                }
            } catch (error) {
                toast(error.response.data.message);
                console.log(error);
            }
        } else {
            validator.current.showMessages();
            setForceUpdate(!forceUpdate);
        }
    }

    useEffect(() => {
        getAdminRoles();
        getAdmins();
    }, []);

    return (
        <>
            <div className="container-fluid">
                <form onSubmit={handelSubmit}>
                    <div className="row">
                        <div className="col-4">
                            <div className="card shadow">
                                <div className="card-header">
                                    <h6 className="font-weight-bold text-primary">تصویر حساب کاربری</h6>
                                </div>
                                <div className="card-body flex-column d-flex  align-items-center" >
                                    <label
                                        htmlFor="imageUrl"
                                    >
                                        <img className="img-fluid" src={image} style={{ height: "10rem", margin: "20px", borderRadius: "50%" }} alt="erorr"/>
                                    </label>
                                    <input
                                        id="imageUrl"
                                        name="imageUrl"
                                        type="file"
                                        accept="image/*"
                                        aria-describedby="imageUrl"
                                        onChange={showimage}
                                        style={{ display: "none" }}
                                    />
                                    {validator.current.message(
                                        "imageUrl",
                                        (image === "/img/undraw_profile.svg") ? false : true,
                                        "accepted"
                                    )}
                                </div>
                            </div>
                        </div>
                        <div className="col-8">
                            <div className="card shadow">
                                <div className="card-header">
                                    <h6 className="font-weight-bold text-primary">مشخصات حساب کاربری</h6>
                                </div>
                                <div className="card-body">
                                    <div className="d-flex">
                                        <div className="flex-fill m-2">
                                            <div className="form-group">
                                                <label htmlFor="password">رمز عبور</label>
                                                <input placeholder="رمز عبور" name="password" id="password" className="form-control form-control-user" type="text" value={password} onChange={(e) => setPassword(e.target.value)} />
                                                {validator.current.message(
                                                    "password",
                                                    password,
                                                    rules('password')
                                                )}
                                            </div>
                                            <div className="form-group">
                                                <label htmlFor="family">نام خانوادگی</label>
                                                <input name="family" id="family" value={family} onChange={
                                                    (e) => {
                                                        setFamily(e.target.value);
                                                    }} className="form-control form-control-user" placeholder="نام خانوادگی" style={{ textAlign: "right" }} />
                                                {validator.current.message(
                                                    "family",
                                                    family,
                                                    "required"
                                                )}
                                            </div>
                                        </div>
                                        <div className="flex-fill m-2" >
                                            <div className="form-group">
                                                <label htmlFor="username">نام کاربری</label>
                                                <input name="username" id="username" value={username} onChange={
                                                    (e) => {
                                                        setUsername(e.target.value);
                                                    }} className="form-control form-control-user" placeholder="نام کاربری" />
                                                {validator.current.message(
                                                    "username",
                                                    username,
                                                    rules('username')
                                                )}
                                            </div>
                                            <div className="form-group">
                                                <label htmlFor="name">نام</label>
                                                <input name="name" id="name" value={name} onChange={
                                                    (e) => {
                                                        setName(e.target.value);
                                                    }} className="form-control form-control-user" placeholder="نام" style={{ textAlign: "right" }} />
                                                {validator.current.message(
                                                    "name",
                                                    name,
                                                    "required"
                                                )}
                                            </div>
                                        </div>
                                    </div>
                                    <div className="form-group">
                                        <label htmlFor="description">توضیحات</label>
                                        <textarea name="description" id="description" value={description} onChange={
                                            (e) => {
                                                setDescription(e.target.value);
                                            }} className="form-control form-control-user" style={{ textAlign: "right" }} >
                                        </textarea>
                                        {validator.current.message(
                                            "description",
                                            description,
                                            "required"
                                        )}
                                    </div>
                                    <div className="d-flex  mb-2 mx-2">
                                        <div className="input-group">
                                            <select className="custom-select" id="roleSelect" onChange={(e) => setRoleId(e.target.value)}>
                                                {
                                                    (adminRoles != null) ?
                                                        adminRoles.map((row, index) =>
                                                            <option value={row.role_id} key={generateID()}>{row.name}</option>
                                                        )
                                                        : null
                                                }
                                            </select>
                                            <div className="input-group-prepend" >
                                                <label className="input-group-text" htmlFor="roleSelect">نقش</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="row mb-2 mx-2">
                                        <div className="col-6">
                                            <button type="submit" className={(selecting) ? "btn btn-success btn-user w-100" : "btn btn-primary btn-user w-100"}>
                                                {(selecting) ? "ذخیره تغییرات" : "ساخت حساب"}
                                            </button>
                                        </div>
                                        <div className="col-6">
                                            {(selecting) ? <button onClick={() => {
                                                setclearSelect(generateID());
                                                resetInputs(null);
                                            }} className="btn btn-warning btn-user flex-fill  w-100" type="button">
                                                لغو انتخاب
                                              </button> : null}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div className="row mt-2">
                    <div className="col-12">
                        <div className="card shadow">
                            <div className="card-header">
                                <h6 className="font-weight-bold text-primary">تصویر حساب کاربری</h6>
                            </div>
                            <div className="card-body" >
                                {(admins != null && adminRoles != null) ?
                                    <Table titles={[
                                        "نام خانوادگی",
                                        "نام",
                                        "نقش",
                                        "نام کاربری"
                                    ]} data={admins} select={true} clearSelect={clearSelect} selectLisener={(selectedData) => {
                                        if (selectedData != null) {
                                            resetInputs(selectedData);
                                        }
                                    }} columens={columens} />
                                    : null}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
export default Admins;
