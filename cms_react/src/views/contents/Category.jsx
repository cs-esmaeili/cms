import { useState } from "react";

const Category = () => {


    const [category, setCategory] = useState(null);

    const

    return (
        <div>
            <div className="row justify-content-end">
                <div className="col-3 d-flex  justify-content-center align-items-center" style={{ borderStyle: "dotted" }}>
                    <i class="fas fa-plus"></i>
                </div>
                {list.map((value, index) =>
                    <>
                        <div className="col-3">
                            <ul class="list-group">
                                <li class="list-group-item">Cras justo odio</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                            </ul>
                        </div>
                    </>
                )}

            </div>
        </div>
    );
}
export default Category;
