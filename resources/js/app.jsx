import './bootstrap';
import ReactDOM from "react-dom/client";
import Task from "./Component/Task/Task";
import { BrowserRouter as Router,Route,Routes,Link } from 'react-router-dom';
import Create from './Component/Task/create';
import Edit from './Component/Task/edit';
import Header from './Component/Header';

const root = ReactDOM.createRoot(document.getElementById('app'));
root.render(
 <div>
    <Router>
        <Header />
        <Routes>
            <Route path="/" element={<Task />} />
            <Route path="/create" element={<Create />} />
            <Route path="/edit/id" element={<Edit />} />
        </Routes>
    </Router>
    </div>

);
