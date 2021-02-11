import React, { useState, useEffect, useRef } from "react";
import Table from './../components/Table';
import { _addKey, _deleteKey } from './../../services/Key_Value';
import { toast } from 'react-toastify';
import { _sliderImages } from './../../services/IndexPage';
import useGenerator from "../../global/Idgenerator";


const Dashboard = () => {

    const [sliderImages, setSliderImages] = useState(null);
    const [generateID] = useGenerator();

    const getSliderImages = async () => {
        try {
            const respons = await _sliderImages();
            if (respons.data.statusText === "ok") {
                setSliderImages(respons.data.list);
            }
            toast(respons.data.message);
        } catch (error) { }
    }
    const addKey = async (key, value) => {
        try {
            const respons = await _addKey({ key, value });
            if (respons.data.statusText === "ok") {
                getSliderImages();
            }
            toast(respons.data.message);
        } catch (error) { }
    }
    const deleteKey = async (key_value_id) => {
        try {
            const respons = await _deleteKey({ key_value_id });
            if (respons.data.statusText === "ok") {
                getSliderImages();
            }
            toast(respons.data.message);
        } catch (error) { }
    }

    useEffect(() => {
        getSliderImages();
    }, []);

    const columens = (row, generateID) => {
        return (
            <>
                <th key={generateID()} scope="col" className="text-center">
                    <i className="fa fa-trash" aria-hidden="true" style={{ cursor: "pointer" }} onClick={() => deleteKey(row.key_value_id)}></i>
                </th>
                <th key={generateID()} scope="col" className="text-center">{JSON.parse(row.value).url}</th>
            </>
        );
    }

    return (
        <div>
            <div className="row m-2">
                <div className="col-12">
                    <div className="card shadow">
                        <div className="card-header">
                            <h6 className="font-weight-bold text-primary">کلمات کلیدی</h6>
                        </div>
                        <div className="card-body" >
                            <input className="form-control mb-2" style={{ textAlign: "right" }} onKeyDown={(e) => {
                                if (e.key === 'Enter') {
                                    addKey('indexPage', { location: 1, url: e.target.value });
                                    e.target.value = "";
                                }
                            }} />
                            <Table titles={[
                                "عملیات",
                                "url",
                            ]} data={sliderImages} select={false} columens={columens} />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Dashboard;
