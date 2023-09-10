function moveUp(e) {
  const { col, row } = e.target.dataset;
  (row > 0) && inputFocus(row - 1, col);
}

function moveDown(e, lastRow=false) {
  const { col, row } = e.target.dataset;
  lastRow || inputFocus(parseInt(row) + 1, col);
}

function moveLeft(e) {
  const { col, row } = e.target.dataset;
  (col > 0) && inputFocus(row, col - 1);
}

function moveRight(e, lastCol=false) {
  const { col, row } = e.target.dataset;
  lastCol || inputFocus(row, parseInt(col) + 1);
}

function inputFocus(row, col) {
  document
    .querySelector(`td input[data-row="${row}"][data-col="${col}"]`)
    .focus();
}


export {
  moveUp,
  moveDown,
  moveLeft,
  moveRight,
};
