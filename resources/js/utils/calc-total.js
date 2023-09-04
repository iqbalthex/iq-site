export function calcTotal(rowIndex) {
  const rowDatas = document.querySelectorAll(`td input[data-row="${rowIndex}"]`);
  const values   = [ ...rowDatas ].map(input => parseFloat(input.value));
  const total    = values.reduce((acm, current) => (acm + current));

  const totalCell = document.querySelector(`td[data-total="${rowIndex}"]`);
  totalCell.innerText = total.toFixed(2);
}
