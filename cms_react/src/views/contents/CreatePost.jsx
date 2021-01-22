import React, { useState, useRef, useEffect } from "react";
import JoditEditor from "jodit-react";
import { _createPost } from './../../services/Post';
import { toast } from 'react-toastify';
import { _categoryListPure } from "../../services/Category";
import useGenerator from "../../global/Idgenerator";
const CreatePost = () => {

    const editor = useRef(null)
    const [category_id, setCategory_id] = useState(null);
    const [categoryPure, setCategoryPure] = useState(null);
    const [image, setImage] = useState('');
    const [title, setTitle] = useState('');
    const [description, setDescription] = useState('');
    const [meta_keywords, setMeta_keywords] = useState('');
    const [generateID] = useGenerator();
    const getCtegorysPure = async () => {
        try {
            const respons = await _categoryListPure();
            if (respons.data.statusText === "ok") {
                setCategoryPure(respons.data.list);
                setCategory_id(respons.data.list[0].category_id);
            }
        } catch (error) { }
    }
    const createPost = async (status) => {
        try {
            const data = {
                category_id,
                image,
                title,
                body: editor.current.value,
                description,
                meta_keywords,
                status
            };
            const respons = await _createPost(data);
            console.log(respons.data.statusText);
            if (respons.data.statusText === "ok") {
                setCategory_id(categoryPure[0].category_id);
                setImage("");
                setTitle("");
                setDescription("");
                setMeta_keywords("");
            }
            toast(respons.data.message);
        } catch (error) { }
    }
    useEffect(() => {
        getCtegorysPure();
        return () => {

        }
    }, []);
    return (
        <>
            <form onSubmit={createPost}>
                <div className="row m-2">
                    <div className="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-2">
                        <div className="card shadow">
                            <div className="card-header">
                                <h6 className="font-weight-bold text-primary">دسته بندی</h6>
                            </div>
                            <div className="card-body" >
                                <select className="form-control justify-content-center" style={{ direction: "rtl" }} onChange={(e) => setCategory_id(e.target.value)}>
                                    {categoryPure != null && categoryPure.map(element => <option key={generateID()} value={element.category_id}>{element.name}</option>)}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-4 col-lg-12 col-md-12 col-sm-12  mb-2">
                        <div className="card shadow">
                            <div className="card-header">
                                <h6 className="font-weight-bold text-primary">عکس ID</h6>
                            </div>
                            <div className="card-body" >
                                <input className="form-control" style={{ textAlign: "right" }} value={image} onChange={(e) => setImage(e.target.value)} />
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-4 col-lg-12 col-md-12 col-sm-12  mb-2">
                        <div className="card shadow">
                            <div className="card-header">
                                <h6 className="font-weight-bold text-primary">عنوان</h6>
                            </div>
                            <div className="card-body" >
                                <input className="form-control" style={{ textAlign: "right" }} value={title} onChange={(e) => setTitle(e.target.value)} />
                            </div>
                        </div>
                    </div>
                </div>
                <div className="row m-2">
                    <div className="col-12">
                        <div className="card shadow">
                            <div className="card-header">
                                <h6 className="font-weight-bold text-primary">توضیحات</h6>
                            </div>
                            <div className="card-body" >
                                <input className="form-control" style={{ textAlign: "right" }} value={description} onChange={(e) => setDescription(e.target.value)} />
                            </div>
                        </div>
                    </div>
                </div>
                <div className="row m-2">
                    <div className="col-12">
                        <div className="card shadow">
                            <div className="card-header">
                                <h6 className="font-weight-bold text-primary">کلمات کلیدی</h6>
                            </div>
                            <div className="card-body" >
                                <input className="form-control" style={{ textAlign: "right" }} value={meta_keywords} onChange={(e) => setMeta_keywords(e.target.value)} />
                            </div>
                        </div>
                    </div>
                </div>
                <div className="row m-2">
                    <div className="col-12">
                        <div className="card shadow">
                            <div className="card-header">
                                <h6 className="font-weight-bold text-primary">مطلب</h6>
                            </div>
                            <div className="card-body" >
                                <JoditEditor
                                    ref={editor}
                                    value=""
                                    config={{
                                        readonly: false
                                    }}
                                    tabIndex={1} // tabIndex of textarea
                                    onBlur={newContent => { }} // preferred to use only this option to update the content for performance reasons
                                    onChange={newContent => { }}
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div className="row m-2">
                    <div className="col-xl-4 col-lg-12 col-md-12 col-sm-12  mb-2">
                        <div className="card shadow">
                            <div className="card-header">
                            </div>
                            <div className="card-body" >
                                <button type="button" className="btn btn-danger" style={{ width: "100%" }}>حذف</button>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-4 col-lg-12 col-md-12 col-sm-12  mb-2">
                        <div className="card shadow">
                            <div className="card-header">
                            </div>
                            <div className="card-body" >
                                <button type="button" className="btn btn-warning" style={{ width: "100%" }} onClick={() => createPost(1)}>ثبت و انشار</button>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-4 col-lg-12 col-md-12 col-sm-12  mb-2">
                        <div className="card shadow">
                            <div className="card-header">
                            </div>
                            <div className="card-body" >
                                <button type="button" className="btn btn-success" style={{ width: "100%" }} onClick={() => createPost(0)}>ثبت</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </>
    );
}

export default CreatePost;
