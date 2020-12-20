import React, { useState, useEffect } from 'react';
import Table from "../components/Table.jsx";
import { toast } from 'react-toastify';
import useGenerator from "../../global/Idgenerator";
import { _Roles, _Permissions } from "../../services/Person";
import AddRole from "../components/modals/AddRole";

const Role_Permissions = () => {

    const [generateID] = useGenerator();
    const [roles, setRoles] = useState(null);
    const [permissions, setPermissions] = useState(null);

    const roleColumens = (row, generateID) => {
        return (
            <>
                <th key={generateID()} scope="col" className="text-center">{row.name}</th>
                <th key={generateID()} scope="col" className="text-center">{row.role_id}</th>
            </>
        );
    }
    const permissionsColumens = (row, generateID) => {
        return (
            <>
                <th key={generateID()} scope="col" className="text-center">{row.name}</th>
                <th key={generateID()} scope="col" className="text-center">{row.permission_id}</th>
            </>
        );
    }

    const getRoles = async () => {
        try {
            const respons = await _Roles();
            if (respons.data.statusText == "ok") {
                setRoles(respons.data.list);
            }
        } catch (error) { }
    }
    const getPermissions = async (role_id) => {

        try {
            const respons = await _Permissions({ role_id });
            if (respons.data.statusText == "ok") {
                setPermissions(respons.data.list);
            }
        } catch (error) { }
    }

    useEffect(() => {
        getRoles();
    }, []);

    return (
        <>
            <div className="container-fluid">
                <div className="row">
                    <div className="col-12">
                        <div className="card shadow">
                            <div className="card-header">
                                <h6 className="font-weight-bold text-primary">نقش ها</h6>
                            </div>
                            <div className="card-body" >
                                {(roles != null) ?
                                    <Table titles={[
                                        "نام",
                                        "id",
                                    ]} data={roles} select={true} clearSelect={null} selectLisener={(selectedData) => {
                                        if (selectedData != null) {
                                            getPermissions(selectedData.role_id);
                                        }
                                    }} columens={roleColumens} loadSomething={() => {
                                        return (
                                            <>
                                                <div style={{ borderStyle: "dashed", padding: "10px", textAlign: "center" }} data-toggle="modal" data-target="#Modal_AddRole">
                                                    <i className="fa fa-plus" aria-hidden="true"></i>
                                                </div>
                                                <AddRole />
                                            </>
                                        );
                                    }} />
                                    : null}
                            </div>
                        </div>
                    </div>
                </div>
                <div className="row mt-3">
                    <div className="col-12">
                        <div className="card shadow">
                            <div className="card-header">
                                <h6 className="font-weight-bold text-primary">دسترسی ها</h6>
                            </div>
                            <div className="card-body" >
                                {(permissions != null) ?
                                    <Table titles={[
                                        "نام",
                                        "id",
                                    ]} data={permissions} select={true} clearSelect={null} selectLisener={(selectedData) => {
                                        if (selectedData != null) {

                                        }
                                    }} columens={permissionsColumens} />
                                    : null}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </>
    );
}
export default Role_Permissions;
