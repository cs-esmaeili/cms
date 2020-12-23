import React, { useState, useEffect } from 'react';
import Table from "../components/Table.jsx";
import { toast } from 'react-toastify';
import { _Roles, _RolePermissions } from "../../services/Person";
import AddRole from "../components/modals/AddRole";
import { _DeletePermission } from './../../services/Person';
import AddPermission from './../components/modals/AddPermission';

const Role_Permissions = () => {

    const [roles, setRoles] = useState(null);
    const [permissions, setPermissions] = useState(null);
    const [selectedRole, setSelectedRole] = useState(null);

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
                <th key={generateID()} scope="col" className="text-center">
                    <button
                        className="btn btn-danger btn-icon-split"
                        type="button"
                        onClick={() => deletePermission(selectedRole, row.permission_id)}
                    >
                        <span
                            className="text"
                            style={{ width: "100%" }}
                        >
                            حذف
                         </span>
                        <span className="icon text-white-50">
                            <i className="fas fa-exclamation-triangle"></i>
                        </span>

                    </button>
                </th>
                <th key={generateID()} scope="col" className="text-center">{row.name}</th>
                <th key={generateID()} scope="col" className="text-center">{row.permission_id}</th>
            </>
        );
    }

    const getRoles = async () => {
        try {
            const respons = await _Roles();
            if (respons.data.statusText === "ok") {
                setRoles(respons.data.list);
            }
        } catch (error) { }
    }
    const getRolePermissions = async (role_id) => {
        try {
            const respons = await _RolePermissions({ role_id });
            if (respons.data.statusText === "ok") {
                setPermissions(respons.data.list);
            }
        } catch (error) { }
    }

    const deletePermission = async (role_id, permission_id) => {
        try {
            const respons = await _DeletePermission({ role_id, permission_id });
            if (respons.data.statusText === "ok") {
                toast(respons.data.message);
                getRolePermissions(role_id);
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
                                    ]} data={roles} select={true} selectLisener={(selectedData) => {
                                        if (selectedData != null) {
                                            setSelectedRole(selectedData.role_id);
                                            getRolePermissions(selectedData.role_id);
                                        }
                                    }} columens={roleColumens} loadSomething={() => {
                                        return (
                                            <>
                                                <div style={{ borderStyle: "dashed", padding: "10px", textAlign: "center" }} data-toggle="modal" data-target="#Modal_AddRole">
                                                    <i className="fa fa-plus" aria-hidden="true"></i>
                                                </div>
                                                <AddRole update={() => { getRoles(); }} />
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
                                    <>
                                        <Table titles={[
                                            "عملیات",
                                            "نام",
                                            "id",
                                        ]} data={permissions} select={false} columens={permissionsColumens} />

                                        <div style={{ borderStyle: "dashed", padding: "10px", textAlign: "center" }} data-toggle="modal" data-target="#Modal_AddPermission">
                                            <i className="fa fa-plus" aria-hidden="true"></i>
                                        </div>
                                        <AddPermission selectedRole={selectedRole} update={() => {
                                            getRolePermissions(selectedRole);
                                        }} />
                                    </>
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
