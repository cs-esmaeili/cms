import { useState, useEffect } from "react";
import { _addCategory, _categoryList } from './../../services/Category';
import useGenerator from "../../global/Idgenerator";
import { toast } from 'react-toastify';

const Category = () => {


    const [category, setCategory] = useState(null);

    const [name, setName] = useState(null);
    const [type, setType] = useState(null);
    const [file_id, setFile_id] = useState(null);
    const [parent_id, setParent_id] = useState(0);

    const [generateID] = useGenerator();
    let PureList = [];

    const getCtegorys = async () => {

        try {
            const respons = await _categoryList();
            if (respons.data.statusText === "ok") {
                setCategory(respons.data.list);
            }
        } catch (error) { }
    }

    const elements = (array) => {
        let outPut = [];
        let checker = () => array.every(v => Array.isArray(v));
        for (let index = 0; index < array.length; index++) {
            let items = [];
            if (Array.isArray(array[index])) {
                let result = (
                    (array === category)
                        ?
                        <div key={generateID()} className="col-3">
                            <ul key={generateID()} className="list-group">
                                {elements(array[index])}
                            </ul>
                        </div>
                        :
                        (checker() === true) ?
                            <ul key={generateID()} className="list-group m-1">
                                {elements(array[index])}
                            </ul>
                            :
                            <li key={generateID()} className="list-group-item">
                                <ul key={generateID()} className="list-group m-1">
                                    {elements(array[index])}
                                </ul>
                            </li>
                );
                items = [...items, result];
            } else {
                let element = <li key={generateID()} className="list-group-item">{array[index].name}</li>;
                items = [...items, element];
                PureList = [...PureList, array[index]];
            }
            outPut = [...outPut, items];
        }
        return outPut;
    }
    const addCategory = async (event) => {
        event.preventDefault();

        try {
            const data = {
                name,
                type,
                file_id,
                parent_id
            };
            console.log(data);
            const respons = await _addCategory(data);
            if (respons.data.statusText === "ok") {
                setName("");
                setType("");
                setFile_id("");
                getCtegorys();
            }
            toast(respons.data.message);
        } catch (error) { }
    }

    useEffect(() => {
        getCtegorys();
    }, []);

    return (
        <div>
            <div className="row m-2 justify-content-end">
                {category != null && elements(category)}
            </div>
            <form className="m-2" onSubmit={addCategory}>

                <div className="card shadow">
                    <div className="card-header">
                        <h6 className="font-weight-bold text-primary">دسترسی ها</h6>
                    </div>
                    <div className="card-body" >
                        <div className="row" >
                            <div className="col-3">
                                <div className="form-group">
                                    <label htmlFor="fileId">ای دی فایل</label>
                                    <input className="form-control" id="fileId" value={file_id} onChange={(e) => setFile_id(e.target.value)} />
                                </div>
                            </div>
                            <div className="col-3">
                                <div className="form-group">
                                    <label htmlFor="categoryName">نام دسته بندی</label>
                                    <input className="form-control" id="categoryName" value={name} onChange={(e) => setName(e.target.value)} />
                                </div>
                            </div>
                            <div className="col-3">
                                <div className="form-group">
                                    <label htmlFor="categoryType">نوع دسته بندی</label>
                                    <input className="form-control" id="categoryType" value={type} onChange={(e) => setType(e.target.value)} />
                                </div>
                            </div>
                            <div className="col-3">
                                <div className="form-group">
                                    <label htmlFor="parentSelect">مجموعه مورد نظر</label>
                                    <select className="form-control" id="parentSelect" onChange={(e) => setParent_id(e.target.value)}>
                                        <option value="0">مجموعه جدید</option>
                                        {category != null && PureList.map(element => <option value={element.category_id}>{element.name}</option>)}
                                    </select>
                                </div>
                            </div>
                            <div className="col-12 m-2" style={{ textAlign: "center" }}>
                                <button type="submit" class="btn btn-success">ساخت دسته بندی</button>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    );
}
export default Category;
