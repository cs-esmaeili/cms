import { useState, useEffect } from "react";
import { _categoryList } from './../../services/Category';
import useGenerator from "../../global/Idgenerator";

const Category = () => {


    const [category, setCategory] = useState(null);
    const [generateID] = useGenerator();

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
        // console.log(checker());
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
                            <li  key={generateID()} className="list-group-item">
                                <ul key={generateID()} className="list-group m-1">
                                    {elements(array[index])}
                                </ul>
                            </li>
                );
                items = [...items, result];

            } else {

                items = [...items,
                <li key={generateID()} className="list-group-item">{"parent_id = " + array[index].parent_id + " category_id = " + array[index].category_id}</li>
                ];

            }
            outPut = [...outPut, items];
        }
        return outPut;
    }

    useEffect(() => {
        getCtegorys();
    }, []);

    return (
        <div>
            <div className="row justify-content-end">
                <div className="col-3 d-flex  justify-content-center align-items-center" style={{ borderStyle: "dotted" }}>
                    <i className="fas fa-plus"></i>
                </div>

                {category != null && elements(category)}

            </div>
        </div>
    );
}
export default Category;
