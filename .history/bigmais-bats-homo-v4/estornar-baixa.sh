#!/bin/sh

dir=/u/concilia/ENTRADA

echo -n "$1" > ${dir}/extrato.par
cd /u/sist/exec
cobrun spr725.gnt
