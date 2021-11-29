import React, { useState } from 'react';
import { useInput } from '../hooks/input-hook';
import CharactersTable from './CharactersTable';

function App(props) {
    const [result, setResult] = useState(null);
    const [classMessage, setClassMessage] = useState('');
    const { value:input, bind:bindInput, reset:resetInput } = useInput('');


    const onClickHandler = (e) => {
        e.preventDefault();

        axios.post('/api/convert', {
                'roman': input
            })
            .then(response => {
                setResult('Arabic: ' + response.data.arabic);
                setClassMessage('success');
            })
            .catch(function (error) {
                if (error.response) {
                    setResult(error.response.data.errors.roman);
                    setClassMessage('warning');
                }
            });
    }
    
    return (
        <div className="container">
            <div className="row">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">
                            Roman 2 Arabic
                        </div>
                        <div className="card-body">
                            <input type="text" {...bindInput} className="form-control" placeholder="Roman"/>

                            <hr/>
                            <button className="btn btn-primary btn-lg btn-block" onClick={onClickHandler}>
                                Convert
                            </button>
                            <hr/>
                            { result &&
                                <h5 className={'alert alert-' + classMessage} role="alert">
                                    {result}
                                </h5>
                            }
                        </div>
                    </div>
                </div>
                <div className="col-md-4">
                    <div className="card">
                        <div className="card-header">
                            Reference (<a href="http://www.web40571.clarahost.co.uk/roman/howtheywork.htm#larger" target="_blank">Read more</a>)
                        </div>
                        <div className="card-body">
                            <CharactersTable/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default App