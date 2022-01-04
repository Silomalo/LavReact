import React from 'react';
import {BrowserRouter, Routes,Route} from 'react-router-dom';
import Student from './views/student';
import Addstudent from './views/add_student';
import Editstudent from './views/edit_student';

function App() {
  return (
    <BrowserRouter>
    <Routes>
        <Route exact path="/" element={<Student/>} />
        <Route path="/add-student" element={<Addstudent/>} />
        <Route path="/edit-student/:id" element={<Editstudent/>} />
        {/* <Route path="/edit-student/:id" render={(props) => <Editstudent {...props} />}/> */}
    </Routes>
    </BrowserRouter>
  );
}
export default App;