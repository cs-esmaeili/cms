import React, { useEffect, useState } from 'react';
import { _publicFolderFiles, _deletePublicFolderOrFile, _createPublicFolder, _savePublicFiles } from './../../services/FileManager';
import useGenerator from "../../global/Idgenerator";
import { toast } from 'react-toastify';
import UploadFile from './../components/modals/UploadFile';

const FileManager = () => {

    const [currentFolderFiles, setCurrentFolderFiles] = useState(null);
    const [currentPath, setCurrentPath] = useState("/");
    const [selectedItems, setSlectedItems] = useState(null);
    const [persent, setPersent] = useState(null);
    const [generateID] = useGenerator();
    const publicFolderFiles = async (path) => {
        try {
            const data = {
                path: path,
                params: {}
            };
            const respons = await _publicFolderFiles(data);
            if (respons.data.statusText === "ok") {
                document.getElementById('path').value = path;
                setCurrentFolderFiles(respons.data.list);
            } else {
                toast(respons.data.message);
            }
        } catch (error) { }
    }
    const deleteFilesAndFolder = async () => {
        try {
            const data = {
                path: currentPath,
                list: selectedItems,
            };
            const respons = await _deletePublicFolderOrFile(data);
            if (respons.data.statusText === "ok") {
                publicFolderFiles(currentPath);
            }
            toast(respons.data.message);
        } catch (error) { }
    }
    const createFolder = async (path) => {
        try {
            const data = {
                path,
            };
            const respons = await _createPublicFolder(data);
            if (respons.data.statusText === "ok") {
                publicFolderFiles(currentPath);
            }
            toast(respons.data.message);
        } catch (error) { }
    }

    const uploadFile = async (event) => {
        event.preventDefault();
        try {
            let data = new FormData();
            data.append("path", currentPath);
            data.append("params", JSON.stringify([]));
            for (let i = 0; i < event.target.files.length; i++) {
                data.append("file[]", event.target.files[i]);
            }
            const respons = await _savePublicFiles(data, (persent) => {
                setPersent(persent);
                console.log(persent);
                if (persent === 100) {
                    document.getElementById('Modal_UploadFile_open').click();
                    document.getElementById('uploaderProgress').style.width = "0%";
                    setPersent(null);
                }
            }, () => document.getElementById('Modal_UploadFile_open').click());

            if (respons.data.statusText === "ok") {
                publicFolderFiles(currentPath);
            }
            toast(respons.data.message);
        } catch (error) { }
    }

    useEffect(() => {
        publicFolderFiles(currentPath);
    }, []);

    return (
        <>
            <UploadFile persent={persent} />
            <div className="shadow p-3 mb-5 bg-white rounded">
                <div className="row">
                    <input className="form-control" id="path" defaultValue={currentPath} onKeyDown={(e) => {
                        if (e.key === 'Enter') {
                            setCurrentPath(e.target.value);
                            publicFolderFiles(e.target.value);
                        }
                    }} />
                </div>
                <div className="row">
                    <i className="fas fa-home m-2 customHover noSelect" style={{ cursor: "pointer" }} onClick={() => { setCurrentPath('/'); publicFolderFiles('/'); }}> Home </i>
                    <i className="fas fa-level-up-alt m-2 customHover noSelect" style={(currentPath === "/") ? { pointerEvents: 'none' } : { cursor: "pointer" }} onClick={() => {
                        let index = -1;
                        for (let i = currentPath.length - 2; i >= 0; i--) {
                            if (currentPath[i] === '/') {
                                index = i;
                                break;
                            }
                        }
                        let newPath = currentPath.substring(0, index + 1);
                        setCurrentPath(newPath);
                        publicFolderFiles(newPath);
                    }}> Up one level </i>
                    <i className="far fa-square m-2 customHover noSelect" style={{ cursor: "pointer" }} onClick={() => {
                        setSlectedItems(null);
                    }}> Unselect All </i>
                    <i className="far fa-check-square m-2 customHover noSelect" style={{ cursor: "pointer" }} onClick={() => {
                        let files = document.querySelector('.listFiles').querySelectorAll('div');
                        let items = [];
                        for (let i = 0; i < files.length; i++) {
                            if (files[i].querySelector('div') !== null) {
                                if (files[i].querySelector('div').innerHTML.includes(".")) {
                                    items.push(files[i].querySelector('div').innerHTML);
                                } else {
                                    items.push(files[i].querySelector('div').innerHTML);
                                }
                            }
                        }

                        setSlectedItems(items);
                    }}> Select All </i>
                    <i className="fa fa-trash m-2 customHover noSelect" style={(selectedItems === null) ? { pointerEvents: 'none' } : { cursor: "pointer" }} onClick={() => {
                        if (selectedItems !== null) {
                            deleteFilesAndFolder();
                        }
                    }}> Delete </i>

                    <div className="dropdown">
                        <i className="fas fa-folder-plus m-2 customHover noSelect" data-bs-toggle="dropdown" aria-expanded="false" style={{ cursor: "pointer" }} > NewFolder </i>
                        <ul className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <input type="text" onKeyDown={(e) => {
                                if (e.key === "Enter") {
                                    createFolder(currentPath + e.target.value);
                                    e.target.value = "";
                                }
                            }} />
                        </ul>
                    </div>


                    <label htmlFor="file">
                        <i className="fas fa-upload m-2 customHover noSelect" style={{ cursor: "pointer" }}> Upload </i>
                    </label>
                    <input
                        id="file"
                        type="file"
                        accept="image/*"
                        aria-describedby="file"
                        multiple
                        style={{ display: "none" }}
                        onChange={uploadFile}
                    />
                </div>
            </div>
            <div className="row listFiles">
                {currentFolderFiles != null &&
                    currentFolderFiles.map((value, index) => {
                        return (
                            <div
                                key={generateID()}

                                onClick={(e) => {
                                    if (e.shiftKey) {
                                        if (selectedItems == null) {
                                            setSlectedItems(new Array(value));
                                        } else {
                                            setSlectedItems([...selectedItems, value]);
                                        }
                                    } else {
                                        setSlectedItems(null);
                                        setCurrentPath(currentPath + value + "/");
                                        publicFolderFiles(currentPath + value + "/");
                                    }
                                }}
                                className={(selectedItems !== null && selectedItems.includes(value)) ?
                                    "col-xl-1 col-lg-2 col-md-3 col-sm-4 text-truncate customHover selectedItems"
                                    :
                                    "col-xl-1 col-lg-2 col-md-3 col-sm-4 text-truncate customHover"
                                }
                                style={{
                                    margin: "10px",
                                    textAlign: "center",
                                }}>
                                {(value.includes('.') ?
                                    <i className="fas fa-5x fa-file"></i>
                                    :
                                    <i className="fa fa-5x fa-folder" aria-hidden="true"></i>
                                )}
                                <div>{value}</div>
                            </div>
                        );
                    })
                }
            </div>
        </>
    );
}
export default FileManager;
