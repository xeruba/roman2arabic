import React from 'react';

function CharactersTable(props) {
    
    return (
        <table className="table">
            <thead className="thead-dark">
                <tr>
                    <th scope="col">Roman</th>
                    <th scope="col">Arabic</th>
                    <th scope="col">Use as inputs</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>I</td>
                    <td>1</td>
                    <td>I</td>
                </tr>
                <tr>
                    <td>V</td>
                    <td>5</td>
                    <td>V</td>
                </tr>
                <tr>
                    <td>X</td>
                    <td>10</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>50</td>
                    <td>L</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>100</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>500</td>
                    <td>D</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>1000</td>
                    <td>M</td>
                </tr>
                <tr>
                    <td className="roman">I</td>
                    <td>1000</td>
                    <td>_I</td>
                </tr>
                <tr>
                    <td className="roman">V</td>
                    <td>5000</td>
                    <td>_V</td>
                </tr>
                <tr>
                    <td className="roman">X</td>
                    <td>10000</td>
                    <td>_X</td>
                </tr>
                <tr>
                    <td className="roman">L</td>
                    <td>50000</td>
                    <td>_L</td>
                </tr>
                <tr>
                    <td className="roman">C</td>
                    <td>100000</td>
                    <td>_C</td>
                </tr>
                <tr>
                    <td className="roman">D</td>
                    <td>500000</td>
                    <td>_D</td>
                </tr>
                <tr>
                    <td className="roman">M</td>
                    <td>1000000</td>
                    <td>_M</td>
                </tr>
            </tbody>
        </table>
    );
}

export default CharactersTable