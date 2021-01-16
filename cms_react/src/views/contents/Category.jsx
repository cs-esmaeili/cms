import { useState, useEffect } from "react";
import { _categoryList } from './../../services/Category';

const Category = () => {


    const [category, setCategory] = useState(null);

    const getCtegorys = async () => {
        try {
            const respons = await _categoryList();
            if (respons.data.statusText === "ok") {
                setCategory(respons.data.list);
                console.log(respons.data.list);
            }
        } catch (error) { }
    }

    useEffect(() => {
        getCtegorys();
    }, []);

    return (
        <div>
            <div className="row justify-content-end">
                <div className="col-3 d-flex  justify-content-center align-items-center" style={{ borderStyle: "dotted" }}>
                    <i class="fas fa-plus"></i>
                </div>
                <div className="col-3">
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                    </ul>
                </div>

            </div>
        </div>
    );
}
export default Category;
