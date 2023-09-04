function moveUp({ target }) {
  let { col, row } = target.dataset;
  (row > 0) && inputFocus(row - 1, col);
}

function moveDown({ target }, lastRow) {
  let { col, row } = target.dataset;
  lastRow || inputFocus(parseInt(row) + 1, col);
}

function moveLeft({ target }) {
  let { col, row } = target.dataset;
  (col > 0) && inputFocus(row, col - 1);
}

function moveRight({ target }, lastCol) {
  let { col, row } = target.dataset;
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
